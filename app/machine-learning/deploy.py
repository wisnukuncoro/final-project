import tensorflow as tf
from tensorflowjs import converters

# Buat model sederhana
model = tf.keras.Sequential([
    tf.keras.layers.Dense(10, activation='relu', input_shape=(32,)),
    tf.keras.layers.Dense(1, activation='sigmoid')
])

# Simpan model ke format TensorFlow.js
converters.save_keras_model(model, 'model_tfjs')
