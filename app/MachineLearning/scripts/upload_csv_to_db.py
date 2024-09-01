# Bagian 1
import pandas as pd
from sqlalchemy import create_engine

# Bagian 2
df = pd.read_csv('app/MachineLearning/data/predict_results.csv', parse_dates=['Tanggal'])

# Bagian 3
username = 'root' 
password = ''
host = 'localhost'
database = 'final_project' 

# Bagian 4
column_mapping = {
  'Tanggal': 'tanggal',
  'Bawang Merah': 'bawang_merah',
  'Bawang Putih': 'bawang_putih',
  'Cabai Merah Keriting': 'cabai_merah_keriting',
  'Cabai Rawit Merah': 'cabai_rawit_merah',
  'Daging Sapi': 'daging_sapi',
  'Daging Ayam': 'daging_ayam',
  'Telur Ayam': 'telur_ayam',
  'Beras': 'beras',
  'Minyak Goreng': 'minyak_goreng',
}

# Bagian 5
df.rename(columns=column_mapping, inplace=True)

# Bagian 6
engine = create_engine(f'mysql+mysqlconnector://{username}:{password}@{host}/{database}')

# Bagian 7
df.to_sql('predict_results', con=engine, if_exists='replace', index=False)