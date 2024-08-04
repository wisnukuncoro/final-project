import os
os.environ['TF_ENABLE_ONEDNN_OPTS'] = '0'
from flask import Flask, request, jsonify
import tensorflow as tf
import numpy as np

app = Flask(__name__)

# Muat model
model = tf.keras.models.load_model('writable\models\model_1.h5')

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json(force=True)
    # Asumsikan data input dikirim sebagai array JSON
    input_data = np.array(data)
    predictions = model.predict(input_data)
    # Kirim prediksi sebagai respons
    return jsonify(predictions.tolist())

if __name__ == '__main__':
    app.run(debug=False)
