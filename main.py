import random
print("Hello, World!")
txt1 = input("Enter first number:")
txt2 = input("Enter second number:")
num1 = int(txt1)
num2 = int(txt2)
def printRandomNumbers(num1, num2):
    print(random.randint(num1, num2))

printRandomNumbers(num1, num2)