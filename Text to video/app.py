import streamlit as st
from gtts import gTTS
from moviepy.editor import *
from PIL import Image, ImageDraw, ImageFont
import textwrap
import os

# Streamlit Interface
st.title("Text-to-Video Converter")

# Input text
text = st.text_area("Enter the text to convert into video:", "Your text goes here")

# Set language
language = 'en'

# Button to generate video
if st.button("Generate Video"):
    if text.strip():
        # ----- TTS SECTION -----
        # Generate speech from text
        tts = gTTS(text=text, lang=language, slow=False)
        tts.save("tts_audio.mp3")

        # ----- IMAGE CREATION SECTION -----
        # Create image with text (1280x720)
        img_width, img_height = 1280, 720
        img = Image.new('RGB', (img_width, img_height), color=(0, 0, 0))  # Black background
        draw = ImageDraw.Draw(img)

        # Use default PIL font (works everywhere)
        font_size = 50
        font = ImageFont.load_default()

        # Wrap text if too long
        lines = textwrap.wrap(text, width=30)

        # Calculate Y position to center text vertically
        total_text_height = sum([draw.textbbox((0, 0), line, font=font)[3] for line in lines]) + (len(lines) - 1) * 10
        y_text = (img_height - total_text_height) // 2

        for line in lines:
            bbox = draw.textbbox((0, 0), line, font=font)
            text_width = bbox[2]
            text_height = bbox[3]
            x_text = (img_width - text_width) // 2
            draw.text((x_text, y_text), line, font=font, fill=(255, 255, 255))
            y_text += text_height + 10

        # Save the image
        img.save("background.png")

        # ----- VIDEO SECTION -----
        # Load image as clip
        image_clip = ImageClip("background.png")

        # Load the TTS audio
        audio_clip = AudioFileClip("tts_audio.mp3")
        audio_duration = audio_clip.duration

        # Set image clip duration to match audio
        image_clip = image_clip.set_duration(audio_duration)

        # Set audio to video
        video = image_clip.set_audio(audio_clip)

        # Export video
        output_filename = "output_video.mp4"
        video.write_videofile(output_filename, fps=24)

        # ----- DISPLAY VIDEO -----
        st.success("✅ Video generated successfully! Play below ⬇️")

        # Display the video in Streamlit
        st.video(output_filename)

        # Optional: Provide a download link for the video
        with open(output_filename, "rb") as video_file:
            st.download_button("Download Video", video_file, file_name=output_filename)
    else:
        st.warning("⚠️ Please enter some text to generate the video.")
