# story.py

import streamlit as st
import cohere
import PyPDF2
from sklearn.metrics.pairwise import cosine_similarity
import numpy as np

# -------------  CONFIG  -------------
COHERE_API_KEY = 'API KEY'  # Replace with your Cohere key
co = cohere.Client(COHERE_API_KEY)

# -------------  FUNCTIONS  -------------

def extract_text_from_pdf(uploaded_file):
    reader = PyPDF2.PdfReader(uploaded_file)
    text = ""
    for page in reader.pages:
        text += page.extract_text() + "\n"
    return text

def split_text(text, max_chunk_size=500):
    words = text.split()
    chunks = [' '.join(words[i:i+max_chunk_size]) for i in range(0, len(words), max_chunk_size)]
    return chunks

def embed_texts(texts):
    response = co.embed(
        texts=texts,
        model='embed-english-v3.0',
        input_type='search_document'   # Important fix here!
    )
    return response.embeddings

def embed_query(query):
    response = co.embed(
        texts=[query],
        model='embed-english-v3.0',
        input_type='search_query'
    )
    return response.embeddings[0]

def find_most_similar_chunk(query_embedding, chunk_embeddings, chunks, top_k=3):
    similarities = cosine_similarity([query_embedding], chunk_embeddings)[0]
    top_indices = similarities.argsort()[-top_k:][::-1]
    top_chunks = [chunks[i] for i in top_indices]
    return top_chunks

def generate_story_continuation(prompt):
    response = co.generate(
        model='command-r-plus',
        prompt=prompt,
        max_tokens=400,
        temperature=0.7
    )
    return response.generations[0].text.strip()

# -------------  STREAMLIT APP  -------------

st.set_page_config(page_title="Interactive Storytelling Engine", layout="wide")
st.title("📖 Interactive Storytelling Engine with RAG")

uploaded_file = st.file_uploader("Upload a Story Universe (PDF/Text)", type=["pdf", "txt"])

if uploaded_file:
    with st.spinner('Extracting story universe...'):
        if uploaded_file.type == "application/pdf":
            full_text = extract_text_from_pdf(uploaded_file)
        else:
            full_text = uploaded_file.read().decode("utf-8")

    st.success("Story universe loaded! Splitting & embedding...")

    chunks = split_text(full_text)
    chunk_embeddings = embed_texts(chunks)

    st.write(f"✅ Story universe loaded and indexed with **{len(chunks)}** chunks!")

    user_prompt = st.text_input("📝 Enter your story prompt / idea")

    if user_prompt:
        query_embedding = embed_query(user_prompt)
        relevant_chunks = find_most_similar_chunk(query_embedding, chunk_embeddings, chunks)

        context = "\n".join(relevant_chunks)
        full_prompt = f"""You are an interactive storytelling AI. Use the following story universe context to continue the story naturally.

Context:
{context}

User prompt: {user_prompt}

Story continuation:"""

        with st.spinner('Generating story continuation...'):
            story_continuation = generate_story_continuation(full_prompt)

        st.subheader("✨ Story Continuation")
        st.write(story_continuation)
