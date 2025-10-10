# Manual de Usuario – SISOFT_SAUL

## 1. Introducción
SISOFT_SAUL es una aplicación web desarrollada en **Laravel 9**, creada como parte del curso de **Desarrollo de Software – SENATI**.  
El sistema permite gestionar un catálogo de productos, realizar operaciones CRUD en el panel administrativo y manejar un carrito de compras funcional.

---

## 2. Inicio de Sesión y Registro
### 🔹 Acceso al sistema
1. Ingrese al navegador y escriba:  
   `http://127.0.0.1:8000`
2. Desde la parte superior, haga clic en **“Inicia sesión”**.
3. Ingrese su correo y contraseña.  
   - Si no tiene cuenta, cree una desde **“Registrarse”**.

> **Usuario de prueba:**  
> - Email: `admin@test.com`  
> - Contraseña: `12345678`

---

## 3. Catálogo de Productos
1. En el menú principal, seleccione **“Productos”** o vaya a:  
   `http://127.0.0.1:8000/productos`
2. Verá todos los productos con imagen, descripción y precio.
3. Para ver más detalles, haga clic en **“Ver detalles”**.

---

## 4. Carrito de Compras
1. En la página de un producto, haga clic en **“Agregar al carrito”**.  
2. Acceda a su carrito desde el menú superior (**ícono 🛒**).  
3. Desde la vista del carrito, puede:
   - Cambiar la **cantidad** de cada producto.  
   - Eliminar productos con el botón **🗑️ Eliminar**.  
   - Ver el **total general** actualizado automáticamente.  
4. Para vaciar el carrito, elimine todos los productos o cierre sesión.

---

## 5. Panel Administrador
> Disponible solo para usuarios autenticados.

1. Inicie sesión como administrador.  
2. Ingrese a:  
   `http://127.0.0.1:8000/admin/productos`
3. Desde aquí puede:
   - **Crear** nuevos productos.  
   - **Editar** productos existentes.  
   - **Eliminar** productos del sistema.  

Cada producto creado aparecerá automáticamente en el catálogo público.

---

## 6. Cierre de Sesión
1. Desde la barra superior, haga clic en **“Cerrar sesión”**.  
2. Será redirigido al inicio.

---

## 7. Recomendaciones
- Use Google Chrome o Microsoft Edge para mejor compatibilidad.  
- No cierre el navegador mientras se realiza una operación CRUD.  
- Si algo falla, limpie la caché del navegador (`Ctrl + F5`).  

---

## 8. Créditos
**Proyecto:** SISOFT_SAUL  
**Desarrollado por:** Equipo SENATI  
**Framework:** Laravel 9  
**Lenguaje:** PHP 8.0  
**Base de datos:** MySQL  

---

*Fin del Manual de Usuario*
