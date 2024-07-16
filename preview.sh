#!/bin/zsh

while true; do                                                                  
        echo "Bienvenidx, elija una de las siguientes opciones:"                                           
        echo "1 - Crear un directorio"                                          
        echo "2 - Crear un archivo en blanco en el directorio"                  
        echo "3 - Listar el archivo"                                             
        echo "4 - Mostar el contenido del archivo"                             
        echo "5 - Eliminar el archivo"                                          
        echo "6 - Salir"                                                        
        echo -n "Ingrese el numero: "                                           
        read opcion

        case $opcion in                                                         
                1)                                                              
                echo -n "Introduzca el nombre del directorio: "                 
                read dir_name                                                   
                mkdir -p "$dir_name"                                            
                echo "Directorio '$dir_name' creado."                           
                ls --color=auto                                                 
                ;; 
                2)                                                              
                echo -n "Introduce el nombre del directorio donde se creara el archivo: "
                read dir_name                                                   
                if [ -d "$dir_name" ]; then                                     
                        echo -n "introduce el nombre del archivo: "             
                        read file_name                                          
                        touch "$dir_name/$file_name"                            
                        echo "Archivo '$file_name' creado en el directorio o '$dir_name'."                                                                
                        ls --color=auto                                         
                else                                                            
                        echo "El directorio '$dir_name' no existe."             
                fi                                                              
                ;;
                3)                                                              
                echo -n "Introduzca el nombre del archivo a listar: "           
                read file_name                                                  
                if [ -f "$file_name" ]; then                                    
                        ls -l "$file_name"                                      
                else                                                            
                        echo "El archivo '$file_name' no existe."               
                fi                                                              
                ;;
                4)                                                              
                echo -n "Introduzca el nombre del archivo cuyo contenido deseas ver: "
                read file_name                                                  
                if [ -f "$file_name" ]; then                                    
                        cat "$file_name"                                        
                else                                                            
                        echo "El archivo '$file_name' no existe."               
                fi                                                              
                ;; 
                5)                                                              
                echo -n "Introduzca el nombre del archivo a elimianr: "         
                read file_name                                                  
                if [ -f "$file_name" ]; then                                    
                        rm "$file_name"                                         
                        echo "Archivo '$file_name' eliminado exitosamente."     
                else                                                            
                        echo "El archivo '$file_name' no existe, compruebe el nombre y ubicacion de su archivo."
                fi                                                              
                ;;
                6)                                                              
                echo "Bye bye..."                                              
                break                                                           
                ;;                                                              
                *)                                                              
                echo "Opcion no vaalida, intente nuevamente."                   
                ;;                                                              
        esac                                                                    
done