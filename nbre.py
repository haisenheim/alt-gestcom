nbre=input()
nbre = int(nbre)
somme=0
i=0
if(nbre==-1):
    print(nbre)
    while(nbre!='F'):
        print('je suis dans la boucle')
        somme+= int(nbre)
        print(somme)
        i+=1
        print(i)

        nbre=input()
        print('apres la lecture')

    print(somme)
else:
    print('je ne suis pas entre')
