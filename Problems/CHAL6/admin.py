from selenium.webdriver.chrome.options import Options
from selenium import webdriver
import sys
import base64

payload = sys.argv[1]
payload = base64.b64decode(payload).decode('utf-8')
pwd = sys.argv[2]

options = Options()
options.add_argument('--headless')
options.add_argument('--no-sandbox')
options.add_argument('--disable-xss-auditor')
browser = webdriver.Chrome(chrome_options=options)
browser.get('http://172.105.214.27:10506/adminview.php?here_is_your_payload='+payload+'&a_secret_str='+pwd)
browser.quit()


###Getting this to work takes pretty much my whole day
###Record some Ref Before I have time to organize and note it
#  http://zhaoyabei.github.io/2016/08/29/Linux%E9%85%8D%E7%BD%AESelenium+Chrome+Python%E5%AE%9E%E7%8E%B0%E8%87%AA%E5%8A%A8%E5%8C%96%E6%B5%8B%E8%AF%95/
#  https://liujia.anqun.org/index.php/archives/980/
#  http://chromedriver.chromium.org/downloads
#  https://stackoverflow.com/questions/31471482/python-stuck-at-selenium-webdriver-chrome
