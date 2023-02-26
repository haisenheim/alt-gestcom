nbre=input()
nbre = int(nbre)
somme=0
i=0
if(nbre==-1):
    nbre=input()
    while(nbre!='F'):
        nbre=int(nbre)
        somme=somme+nbre
        i=i+1
        print(nbre)
        print(somme)
        print(i)
print(somme)
