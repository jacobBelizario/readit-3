from selenium import webdriver
from selenium.webdriver.common.keys import Keys

driver = webdriver.Chrome()
driver.get("http://178.128.60.232/readit-3/")
driver.save_screenshot("one.png")

login = driver.find_element_by_id("login")
login.click()
driver.save_screenshot("login.png")

email = driver.find_element_by_name("email")
email.clear()
email.send_keys("201601012@iacademy.edu.ph")
driver.save_screenshot("email.png")

password = driver.find_element_by_name("password")
password.clear()
password.send_keys("domogoyoulikingsports")
driver.save_screenshot("password.png")

loginButton = driver.find_element_by_name("loginBtn")
loginButton.click()
driver.save_screenshot("loginButton.png")

createpost = driver.find_element_by_id("createpost")
createpost.click()
driver.save_screenshot("createpost.png")

title = driver.find_element_by_name("post_title")
title.clear()
title.send_keys("Test")
driver.save_screenshot("title.png")

description = driver.find_element_by_name("post_description")
description.clear()
description.send_keys("This is a test post created by the script of Karl Bamba")
driver.save_screenshot("description.png")

createButton = driver.find_element_by_id("createPost")
createButton.click()
driver.save_screenshot("createbutton.png")