from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.chrome.options import Options
from webdriver_manager.chrome import ChromeDriverManager
from bs4 import BeautifulSoup
import time

# Setup Selenium Chrome WebDriver
options = Options()
options.add_argument("--headless")  # Menjalankan Chrome dalam mode headless (tanpa GUI)
driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()), options=options)

# URL halaman web yang ingin di-scrape
url = 'https://panelharga.badanpangan.go.id/harga-eceran'

# Buat fungsi untuk scraping
def scrape_data():
    driver.get(url)
    time.sleep(5)  # Tunggu beberapa detik untuk memastikan semua elemen terload

    # Ambil konten HTML dari halaman yang sudah dimuat
    html_content = driver.page_source

    # Parsing HTML dengan BeautifulSoup
    soup = BeautifulSoup(html_content, 'html.parser')

    # Cari elemen tabel harga
    table = soup.find('table', id='tabelharga-table')

    if table:
    # Ambil semua baris dari tabel
      rows = table.find_all('tr')
      
      i = 0

      # Loop melalui setiap baris dan ambil data
      for row in rows:
          # Ambil semua sel dalam baris
          cells = row.find_all('td')
          
          # Extract data from all cells in the row
          row_data = [cell.get_text().strip() for cell in cells]

          # Lakukan sesuatu dengan data yang sudah diambil
          print(f"Data baris {i}: {row_data}")
          i+=1

    else:
        print("Tabel tidak ditemukan.")

    # Tutup browser setelah selesai scraping
    driver.quit()

# Panggil fungsi scraping
scrape_data()