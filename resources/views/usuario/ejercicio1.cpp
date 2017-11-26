#include <sys/types.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <iostream>
#include <string>

using namespace std;



int main() {


	int i, nivel=2; 
	pid_t pid;
	//cout << "Ingrese nivel de descendencia de proceso: ";
	//cin >> nivel;				
	for(i=0; i<nivel; i++) {
		pid=fork();
		printf("PID:%u \n",pid);
		if(pid>0){
			printf("Padre \n");							
		}
		else{
			if(pid==0){
				printf("Soy el proceso con PID:%d y pertenezco a la generación N°%d \n", getpid(), i+1);
			}
			else{
				printf("Error al crear proceso");
			}		
		}
									
	}		
	
	return 0;
}