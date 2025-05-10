import streamlit as st
import cohere

# ---- Hardcode your API Key directly here ----
COHERE_API_KEY = "3fRevwwH4S8LRX4MvAUtzz5pDIOeIPDsoLxH1cSr"

# Initialize Cohere client
co = cohere.Client(COHERE_API_KEY)

# Streamlit UI setup
st.set_page_config(page_title="Text Summarization with Cohere")
st.title("📝 Text Summarizer — Powered by Cohere")

st.markdown("Paste a long text and get a short, clear summary instantly!")

# Text input
input_text = st.text_area("Enter your text here:", height=300)

# Submit button
submit = st.button("Summarize")

# Function to summarize text with Cohere
def summarize_text(text):
    response = co.summarize(
        text=text,
        length='medium',       # Options: 'short', 'medium', 'long'
        format='paragraph',    # Options: 'paragraph', 'bullets'
        temperature=0.3
    )
    return response.summary

# When button is clicked
if submit and input_text:
    with st.spinner('Generating summary...'):
        try:
            summary = summarize_text(input_text)
            st.subheader("📋 Summary")
            st.write(summary)
        except Exception as e:
            st.error(f"Error: {e}")
