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