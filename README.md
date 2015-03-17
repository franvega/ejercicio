Ejercicio  (Symfony 2.6.4 y PHP 5.5)
======

Para hacer lo que se comenta en el ejercicio de "Una vez creada una caja mediante el CRUD.." he creado un event listener postPersist para guardar el volumen en la entidad caja que se acaba de crear, es decir, cuando ya está persistida la caja.
También he creado model managers y types para los formularios de los cruds que me ha dado tiempo a hacer. He añadido las doctrine extensions para poder obtener los createdAt y updatedAt automáticamente.
