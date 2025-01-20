import os
from PIL import Image

# Rutas de carpetas
input_folder = "img"  # Carpeta de entrada
output_folder = "salida"  # Carpeta de salida

# Crear la carpeta de salida si no existe
os.makedirs(output_folder, exist_ok=True)

def optimize_image(input_path, output_path):
    """
    Optimiza la imagen reduciendo su tamaño sin pérdida de calidad.
    Preserva la transparencia en imágenes con fondo transparente.
    """
    with Image.open(input_path) as img:
        # Verificar si la imagen tiene transparencia
        if img.mode in ("RGBA", "LA") or (img.mode == "P" and "transparency" in img.info):
            img = img.convert("RGBA")  # Asegurar formato con transparencia
        else:
            img = img.convert("RGB")  # Convertir a RGB para imágenes sin transparencia

        # Optimizar la imagen y guardarla en la carpeta de salida
        img.save(output_path, optimize=True)

def process_images():
    """
    Procesa todas las imágenes en la carpeta de entrada y las guarda optimizadas en la carpeta de salida.
    """
    for filename in os.listdir(input_folder):
        input_path = os.path.join(input_folder, filename)
        output_path = os.path.join(output_folder, filename)

        # Verificar si es un archivo de imagen válido
        if filename.lower().endswith(("png", "jpg", "jpeg", "bmp", "gif", "tiff")):
            try:
                optimize_image(input_path, output_path)
                print(f"Optimizada: {filename}")
            except Exception as e:
                print(f"Error al procesar {filename}: {e}")

if __name__ == "__main__":
    process_images()
