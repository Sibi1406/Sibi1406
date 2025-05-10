import streamlit as st
import cohere

# Initialize Cohere client with your API key
co = cohere.Client('API KEY')  # Replace with your actual key

# Function to generate recipes
def get_recipe(ingredients):
    # Use the Cohere API to generate the recipe
    response = co.generate(
        model='command-r-plus',  # Use 'command-r' or 'command-r-plus' as available
        prompt=f'Give me a recipe using {ingredients}.',
        max_tokens=500  # Adjust the token length as needed
    )
    
    # Access the generated text from the response
    return response.generations[0].text.strip()

# Streamlit User Interface
st.title('Recipe Generator')
st.write("Enter your ingredients and get a recipe suggestion!")

# Input ingredients from the user
ingredients = st.text_input("Enter the ingredients (comma separated):")

# Generate recipe when the user clicks the button
if st.button('Get Recipe'):
    if ingredients:
        recipe = get_recipe(ingredients)
        st.write("Recipe suggestion:\n")
        st.write(recipe)
    else:
        st.write("Please enter some ingredients!")
