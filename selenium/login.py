from selenium import webdriver
from selenium.webdriver.common.keys import Keys

driver = webdriver.Chrome()
driver.get("http://178.128.60.232/readit-3/")
login = driver.find_element_by_id("login")
login.click()
emailElement = driver.find_element_by_name("email")
emailElement.clear()
emailElement.send_keys("dinerosbot@gmail.com")
passwordElement = driver.find_element_by_name("password")
passwordElement.clear()
passwordElement.send_keys("dinerospassword")
loginBtnElement = driver.find_element_by_name("loginBtn")
loginBtnElement.click()

