import os
os.environ['TF_ENABLE_ONEDNN_OPTS'] = '0'
import pickle
from flask import Flask, request, jsonify
import tensorflow as tf
import numpy as np
import calendar
from datetime import datetime

def get_num_days():
    # Mendapatkan bulan dan tahun saat ini
    now = datetime.now()
    current_year = now.year
    current_month = now.month
    current_day = now.day

    # Mendapatkan jumlah hari dalam bulan ini
    _, num_days_current_month = calendar.monthrange(current_year, current_month)
    
    # Cek apakah hari ini adalah hari terakhir dalam bulan ini
    if current_day == num_days_current_month:
        # Menghitung bulan dan tahun berikutnya
        if current_month == 12:  # Jika bulan ini adalah Desember
            next_year = current_year + 1
            next_month = 1
        else:
            next_year = current_year
            next_month = current_month + 1

        # Mendapatkan jumlah hari dalam bulan depan
        _, num_days = calendar.monthrange(next_year, next_month)
    else:
        # Jika belum hari terakhir, gunakan jumlah hari dalam bulan ini
        num_days = num_days_current_month

    return num_days

num_days = get_num_days()

app = Flask(__name__)

# Memuat model dari file
model = tf.keras.models.load_model('app\MachineLearning\models\model_2.h5')

# Memuat scaler dari file
with open('app\MachineLearning\scaler\scaler_1.pkl', 'rb') as file:
    scaler = pickle.load(file)

@app.route('/transform', methods=['POST'])
def transform():
    data = request.get_json(force=True)
    
    data = np.array(data)
    
    data = data.reshape(-1,1)
    
    scaled_values = scaler.transform(data)
    
    return jsonify(scaled_values.tolist())
  
  
@app.route('/predict', methods=['POST'])
def predict():
  data = request.get_json(force=True)
  
  predictions_arr = np.array([])
  
  input_data = np.array(data)
  
  for i in range(num_days):

    predictions = model.predict(input_data)
    predictions_arr = np.append(predictions_arr, predictions)
    
    input_data = np.append(input_data[:, 1:, :], predictions.reshape(1, 1, -1), axis=1)
  
  predictions_arr = predictions_arr.reshape(-1,1)
  original_values = scaler.inverse_transform(predictions_arr)
  original_values = np.round(original_values.reshape(-1,))
  
  return jsonify(original_values.tolist())

if __name__ == '__main__':
    app.run(debug=True)
