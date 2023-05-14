#EJERCIO 1
def suma_pares_impares(limite):
  suma_pares = 0
  suma_impares = 0
  for i in range(1, limite+1):
    if i % 2 == 0:
      suma_pares += i
    else:
      suma_impares += i
  return suma_pares, suma_impares

limite = int(input("Introduce el límite: "))
pares, impares = suma_pares_impares(limite)
print("Suma de números pares:", pares)
print("Suma de números impares:", impares)


#EJERCICIO 2
for i in range(4, 101, 4):
  print(i)
  
#EJERCICIO 3
num = int(input("Introduce un número (0 para salir): "))

while num != 0:
  if num > 0:
    print("El número es positivo")
  else:
    print("El número es negativo")
  num = int(input("Introduce un número (0 para salir): "))
  
#EJERCICIO 4
numeros = []
suma_positivos = 0
suma_negativos = 0
cantidad_positivos = 0
cantidad_negativos = 0
cantidad_ceros = 0

for i in range(10):
  num = int(input("Introduce un número: "))
  numeros.append(num)
  if num > 0:
    suma_positivos += num
    cantidad_positivos += 1
  elif num < 0:
    suma_negativos += num
    cantidad_negativos += 1
  else:
    cantidad_ceros += 1

if cantidad_positivos > 0:
  media_positivos = suma_positivos / cantidad_positivos
  print("Media de números positivos:", media_positivos)
else:
  print("No hay números positivos para calcular la media")

if cantidad_negativos > 0:
  media_negativos = suma_negativos / cantidad_negativos
  print("Media de números negativos:", media_negativos)
else:
  print("No hay números negativos para calcular la media")

print("Cantidad de ceros:", cantidad_ceros)

#EJERCICIO 5
edades = []
alturas = []
suma_edades = 0
suma_alturas = 0
cantidad_mayores = 0
cantidad_altos = 0

for i in range(5):
  edad = int(input("Introduce la edad: "))
  altura = float(input("Introduce la altura: "))
  edades.append(edad)
  alturas.append(altura)
  suma_edades += edad
  suma_alturas += altura
  if edad > 18:
    cantidad_mayores += 1
  if altura > 1.75:
    cantidad_altos += 1

media_edad = suma_edades / 5
media_altura = suma_alturas / 5

print("Edad media:", media_edad)
print("Altura media:", media_altura)
print("Cantidad de personas mayores de 18 años:", cantidad_mayores)
print("Cantidad de personas que miden más de 1.75:", cantidad_altos)

#EJERCICIO 6
notas = []
cantidad_aprobados = 0
cantidad_condicionados = 0
cantidad_suspendidos = 0

for i in range(5):
  nota = float(input("Introduce la nota: "))
  notas.append(nota)
  if nota > 4:
    cantidad_aprobados += 1
  elif nota == 4:
    cantidad_condicionados += 1
  else:
    cantidad_suspendidos += 1

print("Cantidad de estudiantes aprobados:", cantidad_aprobados)
print("Cantidad de estudiantes condicionados:", cantidad_condicionados)
print("Cantidad de estudiantes suspendidos:", cantidad_suspendidos)