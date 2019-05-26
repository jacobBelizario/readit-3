from selenium import webdriver
from selenium.webdriver.common.keys import Keys

driver = webdriver.Chrome()
driver.get("http://178.128.60.232/readit-3/")

signup = driver.find_element_by_id("signup")
signup.click()
firstNameElement = driver.find_element_by_name("fname")
firstNameElement.clear()
firstNameElement.send_keys("Jennifer")
lastNameElement = driver.find_element_by_name("lname")
lastNameElement.clear()
lastNameElement.send_keys("Lopez")
emailElement = driver.find_element_by_name("email")
emailElement.clear()
emailElement.send_keys("jenniferlopez@gmail.com")
passwordElement = driver.find_element_by_name("password")
passwordElement.clear()
passwordElement.send_keys("dinerosbott")
submitBtnElement = driver.find_element_by_name("signUp")
submitBtnElement.click()