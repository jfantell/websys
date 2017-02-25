import json

selected_items = {}

class query:
	def __init__(self, prod):
		self.product_type = prod
		self.product = ''
		self.harddrive = ''
		self.memory = ''
		self.storage = ''
		self.screen_size = ''
		self.color = ''
		self.manufacturer = ''
	def __str__(self):
		return self.product_type

def parse():
	with open('bestbuyapiTest1.json') as json_data: ##open JSON file
	    d = json.load(json_data)  ##decode JSON file - creates dictionary that holds all of the information

	    ##Iteratre through the dictionary (list of keys include 'totalTime', 'currentPage', 'products')
	    ##Specifically interested in products key, which contains a list of dicionaries as its value
	    ##Each dictionary corresponds to a new product listing
	    ##The keys for each product dictionary are longDescription, regularPrice, color, customerReviewAverage, name, image, url
	    for i in range(len(d[u'products'])): 
	    	for j in d[u'products'][i]:
	    		##Find the longDescription key-> it contains a string as its value (the product description)
	    		##We want to split this string into a list and then look for keywords such as color, features, etc.
	    		if (j == "longDescription"):
	    			List = d[u'products'][i][j].strip().split() ##The description, now list of keywords
	    			for i in List:
	    				print List[i]

if __name__ == '__main__':
	print "Welcome to Zeni\n"
	print "Enter the number that best mathces the following criteria\n\n"
	print "What device are you looking for?\n"
	print "1.) Smartphone  2.) Laptop  3.) Tablet\n"
	tmp = raw_input('=> ')
	Obj1 = query(tmp)
	print Obj1
