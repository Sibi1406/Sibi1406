import streamlit as st
from gtts import gTTS
import os
import pygame

# Initialize pygame mixer for sound playback
pygame.mixer.init()

# Streamlit Interface
st.title("Dynamic Text-to-Speech Converter")

# Text input
text_input = st.text_area("Enter Text:", "Hello! This is a dynamic Text to Speech converter.")

# Language selection dropdown
language = st.selectbox("Select Language", ['en', 'hi', 'fr', 'es', 'ta'], index=0)

# Speed selection radio button
speed = st.radio("Select Speed", ('Normal', 'Slow'))

# Button to generate speech
if st.button("Generate Speech"):
    if text_input.strip():
        # Process text-to-speech generation
        try:
            slow = True if speed == 'Slow' else False
            tts = gTTS(text=text_input, lang=language, slow=slow)
            file_path = "output.mp3"
            tts.save(file_path)
            st.success("Speech generated successfully!")

            # Play audio
            pygame.mixer.music.load(file_path)
            pygame.mixer.music.play()

            # Provide download link
            with open(file_path, "rb") as f:
                st.download_button("Download Speech", f, file_name="output.mp3")
        except Exception as e:
            st.error(f"Error: {e}")
    else:
        st.warning("Please enter some text to generate speech.")
