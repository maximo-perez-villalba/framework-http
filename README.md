# framework-http
La componente implementa una simple arquitectura HTTP orientada a objetos escrita en PHP.      
Este proyecto tiene fines pedagógico, sin embargo la componente es completamente funcional.    

## Como se instala

## Como se usa

## Documentación

### Mensajes HTTP
> Los mensajes HTTP son los medios por los cuales se intercambian datos entre servidores y clientes.    
> Hay dos tipos de mensajes: 
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

Los clientes web realizan peticiones sobre los servidores web invocando una [URI](https://es.wikipedia.org/wiki/Identificador_de_recursos_uniforme)  (Uniform Resource Identifier).              

![URI = URL + URN](https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/URI_Euler_Diagram_no_lone_URIs.svg/220px-URI_Euler_Diagram_no_lone_URIs.svg.png)     
Siendo la URL la ubicación del servidor web y la URN la ubicación específica del recurso/acción que se solicita.     

Los servidores web son sistemas preparados para escuchar los eventos de **solicitud de recursos** enviados por los clientes escrito con el protocolo HTTP a través de una conexión de red.     
Existen dos tipos de recursos que pueden solicitar los clientes:      
*  **Recursos estáticos** cuya respuesta es simplemente devolver/transmitir el archivo. Los recursos estáticos son por ejemplo los archivos : HTML, PDF, videos, fotos, etc. 
*  **Recursos dinámicos** en este caso, el servidor delega la ejecución en el script apuntado. Pudiendo el script estar escrito en muchos lenguajes de programación como PHP, Java, NodeJS, CGI,  ect.

     

## ¿Que problema resuelve?    
Este componente permite controlar un conjunto de peticiones escritas con el protocolo HTTP. 
Para poder funcionar la componente requiere tener registradas las peticiones que puede atender.


De manera tal que asocia la URN de la petición a una clase que ejecutaran acciones personalizadas.   
El conjunto de peticiones son registradas y asociadas a un método en una clase  en un archivo de configuración, siendo este archivo donde se define la API rest de la aplicación web.    

      
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
