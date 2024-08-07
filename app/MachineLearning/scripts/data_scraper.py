# Bagian 1
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.support.ui import Select
from selenium.webdriver.common.by import By
from webdriver_manager.chrome import ChromeDriverManager
from bs4 import BeautifulSoup
import time
import json

## Bagian 2
options = Options()
options.add_argument("--headless")

driver = webdriver.Chrome(options=options)

## Bagian 3
url = 'https://panelharga.badanpangan.go.id/harga-eceran'

## Bagian 4
def scrape_data():
    driver.get(url)
    time.sleep(5)

    # Bagian 5
    select_provinsi = Select(driver.find_element(By.ID, 'provinsi-select'))
    select_provinsi.select_by_visible_text('Banten')
    time.sleep(5)

    # Bagian 6
    html_content = driver.page_source
    soup = BeautifulSoup(html_content, 'html.parser')
    table = soup.find('table', id='tabelharga-table')

    # Bagian 7
    data = []
    if table:
        rows = table.find_all('tr')
        headers = rows[0].find_all('th')
        dates = [header.get_text().strip() for header in headers]

        for row in rows[1:]:
            cells = row.find_all('td')
            row_data = {dates[i]: cells[i].get_text().strip() for i in range(len(cells))}
            data.append(row_data)

    # Bagian 8
    driver.quit()
    return data

# Bagian 9
if __name__ == "__main__":
    scraped_data = scrape_data()
    print(json.dumps(scraped_data))
