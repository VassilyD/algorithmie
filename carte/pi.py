def Ndecimal(N):
	decimaleN = 1.0*4/(N*2*(N*2+1)*(N*2+2))
	return decimaleN

def piNDecimal(N):
	rang = N
	decimalPi = 3.0
	for i in range(1,rang):
		decimalPi += ((-1)**(i+1))*Ndecimal(i)
	return decimalPi

nbdec = input("nombre de decimale?")
precision = 0.01**nbdec
n = 1
resultat = piNDecimal(n)
while abs(resultat - 3.141592653589) > precision:
	resultat = piNDecimal(n)
	n += 1
	print resultat, n
print resultat, n
