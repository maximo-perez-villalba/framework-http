# framework-http
El componente implementa una simple arquitectura HTTP en PHP.      
Aunque este es un proyecto con fines pedagógico, la componente es completamente funcional.    

## ¿Que problema resuelve?    
Este componente permite controlar un conjunto de peticiones o mensajes escritos con el protocolo HTTP.    
Todas las peticiones que atiende la aplicación son registradas en un archivo de configuración, siendo este archivo donde se define la API rest de la aplicación web.    

> Los mensajes HTTP son los medios por los cuales se intercambian datos entre servidores y clientes.    
>  Hay dos tipos de mensajes: 
>  * **_peticiones_** enviadas por el cliente al servidor para pedir el inicio de una acción 
>  * y **_respuestas_** que son la respuesta del servidor.     
>     
> Los mensajes HTTP están compuestos de texto, codificado en ASCII, y pueden comprender múltiples líneas.      
> Fuente: [developer.mozilla.org: Mensajes HTTP](https://developer.mozilla.org/es/docs/Web/HTTP/Messages)     
      
<br>   
     
**Ejemplo de comunicación a través del protocolo HTTP**    
```    
POST / HTTP 1.1
GET /background.png HTTP/1.0
HEAD /test.html?query=alibaba HTTP/1.1
OPTIONS /anypage.html HTTP/1.0
```        
      
<br>   
     
## Contexto      
El servidor web ( Nginx, Apache, OpenResty o cualquier otro ) a través de una conexión de red, recibe un evento de **solicitud** de recurso/acción escrito con el protocolo HTTP.       
*  Si la solicitud es de un recurso estático simplemente lo devuelve (pe. archivos: HTML, PDF, videos, fotos, etc) 
*  Si la solicitud es de ejecución de una acción, el servidor delega la ejecución en el script apuntado. Pudiendo el script estar escrito en muchos lenguajes posibles (PHP, Java, NodeJS, CGI,  ect).

Los clientes web realizan peticiones sobre los servidores web invocando una [URI (Uniform Resource Identifier)](https://es.wikipedia.org/wiki/Identificador_de_recursos_uniforme).      
![URI = URL + URN](https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/URI_Euler_Diagram_no_lone_URIs.svg/220px-URI_Euler_Diagram_no_lone_URIs.svg.png)     
Siendo la URL la ubicación del servidor web y la URN la ubicación específica del recurso/acción que se solicita.     

      
<br>   
     


![Figure: UML flowchart > HTTP Request Routes :: start](/docs/uml-flowchart-routes-start.png)    
**Figure: _UML flowchart > HTTP Request Routes :: start_**    

<br>

![Figure: UML flowchart > HTTP Request Routes :: set current request](/docs/uml-flowchart-routes-set-current-request.png)    
**Figure: _UML flowchart > HTTP Request Routes:: set current request_**    

<br>

![Figure: UML flowchart > HTTP Request Routes :: execute current request](/docs/uml-flowchart-routes-execute-current-request.png)   
**Figure: _UML flowchart > HTTP Request Routes :: execute current request_**      

<br>

![Figure: UML class > HTTP framework](/docs/uml-class-http-framework.png)     
**Figure: _UML class > HTTP framework_**      

<br>

![Figure: UML sequence > HTTP request routes :: start](/docs/uml-sequence-http-requests-routes-start.png)      
**Figure: _UML sequence > HTTP request routes :: start_**      

<br>

![Figure: UML sequence > HTTP request routes :: execute current request](/docs/uml-sequence-http-requests-routes-execute-current-request.png)      
**Figure: _UML sequence > HTTP request routes :: execute current request_**      

<br>
