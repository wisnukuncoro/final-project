import os
os.environ['TF_ENABLE_ONEDNN_OPTS'] = '0'
import pickle
from flask import Flask, request, jsonify
import tensorflow as tf
import numpy as np

app = Flask(__name__)

@app.route('/transform', methods=['POST'])
def transform():
    data = request.json['data']
    scaler = request.json['n_scalers']
        
    # Memuat scaler dari file
    with open(f'app\MachineLearning\scalers\scaler_{scaler}.pkl', 'rb') as file:
      scaler = pickle.load(file)
    
    data = np.array(data)
    
    data = data.reshape(-1,1)
    
    scaled_values = scaler.transform(data)
    
    return jsonify(scaled_values.tolist())
  
  
@app.route('/predict', methods=['POST'])
def predict():
  data = request.json['response']
  model = request.json['n_models']
  scaler = request.json['n_scalers']
  
  # Memuat model dari file
  model = tf.keras.models.load_model(f'app\MachineLearning\models\model_{model}.h5')
  
  # Memuat scaler dari file
  with open(f'app\MachineLearning\scalers\scaler_{scaler}.pkl', 'rb') as file:
    scaler = pickle.load(file)
    
  input_data = np.array(data)
  
  input_data = input_data.reshape((1,-1,1))

  predictions = model.predict(input_data)
  
  original_values = scaler.inverse_transform(predictions)
  original_values = np.round(original_values.reshape(-1,))
  
  return jsonify(original_values.tolist())

if __name__ == '__main__':
    app.run(debug=False)
