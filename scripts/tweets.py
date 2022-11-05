import requests
import os
import json

os.environ['TOKEN'] = ''
os.environ['SECRET'] = ''
os.environ['KEY'] = ''

def tweets(id):
  res = requests.get('https://api.twitter.com/2/tweets/search/recent?max_results=100&query="gallons" -has:media from:' + str(id) + ' to:' + str(id), headers={"Authorization": "Bearer {}".format(os.environ['TOKEN'])})
  return res.json()

data = tweets(1450174360346574850)

for i in data["data"]:
  print(i["text"] + "\n")
