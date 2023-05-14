numeros = []

for i in range(5):
    numero = int(input("Ingrese un número: "))
    numeros.append(numero)

mayor = numeros[0]

for i in range(1, 5):
    if numeros[i] > mayor:
        mayor = numeros[i]

for i in range(len(numeros)):
    if numeros[i] == mayor:
        print("El número mayor es:", mayor)
        break