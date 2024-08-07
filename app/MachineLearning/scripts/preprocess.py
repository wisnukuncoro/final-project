import pickle
import json

# Load the scaler
with open('app\MachineLearning\scaler\scaler_1.pkl', 'rb') as file:
    scaler = pickle.load(file)

# Prepare scaler parameters for export
scaler_data = {
    'min': scaler.data_min_.tolist(),
    'range': scaler.data_range_.tolist()
}

# Save scaler parameters to a JSON file
with open('app\MachineLearning\scaler\scaler_1.json', 'w') as json_file:
    json.dump(scaler_data, json_file)