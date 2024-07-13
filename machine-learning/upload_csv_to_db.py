import pandas as pd
from sqlalchemy import create_engine

# Baca file CSV
df = pd.read_csv('machine-learning/dataset.csv', parse_dates=['Tanggal'])

# Koneksi ke database MySQL
username = 'root' 
password = ''
host = 'localhost'
database = 'final_project' 

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

df.rename(columns=column_mapping, inplace=True)

engine = create_engine(f'mysql+mysqlconnector://{username}:{password}@{host}/{database}')

# Impor data ke tabel
df.to_sql('dataset', con=engine, if_exists='replace', index=False)