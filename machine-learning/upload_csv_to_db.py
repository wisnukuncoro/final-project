import pandas as pd
from sqlalchemy import create_engine, MetaData, Table, Column, Float, Date

# Baca file CSV
df = pd.read_csv('machine-learning/dataset.csv', parse_dates=['Tanggal'])

# Koneksi ke database MySQL
username = 'root' 
password = ''
host = 'localhost'
database = 'final_project' 

engine = create_engine(f'mysql+mysqlconnector://{username}:{password}@{host}/{database}')
metadata = MetaData()

# Membuat table di database
table = Table(
    'dataset', 
    metadata,
    Column('Tanggal', Date),
    Column('Bawang Merah', Float),
    Column('Bawang Putih', Float),
    Column('Cabai Merah Keriting', Float),
    Column('Cabai Rawit Merah', Float),
    Column('Daging Sapi', Float),
    Column('Daging Ayam', Float),
    Column('Telur Ayam', Float),
    Column('Beras', Float),
    Column('Minyak Goreng', Float),
)
metadata.create_all(engine)

# Impor data ke tabel
df.to_sql('dataset', con=engine, if_exists='replace', index=False)