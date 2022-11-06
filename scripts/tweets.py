import requests
import os
from os.path import join, dirname
import json
from dotenv import load_dotenv
import re
from pprint import pprint

dotenv_path = join(dirname(__file__), '.env')
load_dotenv(dotenv_path)

def tweets(id):
  res = requests.get('https://api.twitter.com/2/tweets/search/recent?max_results=100&query="gallons" -has:media from:' + str(id) + ' to:' + str(id), headers={"Authorization": "Bearer {}".format(os.getenv('TOKEN'))})
  return res.json()

tweet_data = tweets(1450174360346574850)
data = {}

print(tweet_data["meta"]["result_count"])

for tweet in tweet_data["data"]:
    search = re.compile(r"^(.*?)'s").search(tweet["text"])
    if (search != None):
        name = search.group(1)
        data.setdefault(name, {})
        data[name]["gallons"] = 0
        data[name]["cost"] = 0
        data[name]["lbs"] = 0
        data[name]["tons"] = 0
    search = re.compile(r" (.*?) gallons").search(tweet["text"])
    if (search != None):
        data[name]["gallons"] += int(search.group(1).replace(',', ''))
    search = re.compile(r"\$(.*?) ").search(tweet["text"])
    if (search != None):
        data[name]["cost"] += int(search.group(1).replace(',', ''))
    search = re.compile(r" (.*?) lbs").search(tweet["text"])
    if (search != None):
        data[name]["lbs"] += int(search.group(1).replace(',', ''))
    search = re.compile(r" (.*?) tons").search(tweet["text"])
    if (search != None):
        data[name]["tons"] += int(search.group(1).replace(',', ''))

pprint(data)

