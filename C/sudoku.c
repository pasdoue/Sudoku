#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>

#define SIZE 9

static int sudoku[SIZE][SIZE]={
{0,0,0,3,0,5,0,0,0},
{5,0,8,0,6,0,0,1,0},
{0,3,4,0,2,0,0,0,0},
{8,0,1,0,8,0,0,0,0},
{3,5,0,0,0,0,0,4,7},
{0,0,0,0,0,0,2,0,5},
{0,0,0,0,1,0,9,7,0},
{0,6,0,0,9,0,4,0,8},
{0,0,0,4,0,2,0,0,0}
};


void afficherSudoku(int tab[SIZE][SIZE], int taille)
{
  for(int i=0; i<taille; i++)
    {
      for(int j=0; j<taille;j++)
	{
	  if ( (j+1)%3==0 )
	    {
	      if (j==(taille-1))
		{
		  if ((i==2) || (i==5))
		    {
		      printf("%d\n----------------\n", tab[i][j]);
		    }
		  else
		    {
		      printf("%d\n", tab[i][j]);
		    }
		}
	      else
		{
		  printf("%d | ", tab[i][j]);
		}
	    }
	  
	  else
	    {
	      printf("%d", tab[i][j]);
	    }
	}}}

bool valeurPresenteLigne(int valeur,int tab[SIZE][SIZE],int ligne)
{
  for (int i=0;i<SIZE;i++)
    {
      if (tab[ligne-1][i]==valeur)
	return true;
    }
  return false;
}

bool valeurPresenteColonne(int valeur, int tab[SIZE][SIZE], int colonne)
{
  for (int i=0; i<SIZE; i++)
    {
      if (tab[i][colonne-1]==valeur)
	return true;
    }
  return false;
}

bool valeurPresenteBloc(int valeur, int tab[SIZE][SIZE], int i, int j)
{
  int k=i-(i%3), l=j-(j%3);
  for (i=k; i<k+3; i++)
    for (j=l; j<l+3; j++)
      if (tab[i][j]==valeur)
	return true;
  return false;
}

bool estValide(int tab[SIZE][SIZE], int position)
{
  if (position ==SIZE*SIZE)
    {
      return true;
    }
  int i=position/SIZE, j=position%SIZE;
  //printf("i: %d \t j: %d \t t[i][j]: %d\n",i,j,tab[i][j]);
  if (tab[i][j]!=0)
    return (estValide(tab,position+1));
  for (int k=1; k<=SIZE;k++)
    {
      if ((!valeurPresenteLigne(k,tab,i+1)) && (!valeurPresenteColonne(k,tab,j+1)) && (!valeurPresenteBloc(k,tab,i,j)))
	{
	  tab[i][j]=k;
	  //printf("position= %d \t i= %d \t j= %d \t k= %d\n",position,i,j,k);
	  //printf("ligne: %d \t colonne: %d\n",valeurPresenteLigne(k,sudoku, i),valeurPresenteColonne(k,sudoku, j));
	  if ( estValide (tab, position+1) )
	    return true;
	}
    }
  tab[i][j]=0;
  return false;
}



int main(int argc, char *argv[])
{	
  printf("Sudoku avant le test\n\n");
  afficherSudoku(sudoku, SIZE);

  estValide(sudoku, 0);
  
  printf("Sudoku après le test\n\n");
  afficherSudoku(sudoku, SIZE);
  
}
