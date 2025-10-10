# Informe de Pruebas – SISOFT_SAUL (Versión 0.2)

Este documento resume las pruebas básicas realizadas sobre el prototipo del sistema **SISOFT_SAUL**, desarrollado en Laravel 9, correspondientes a la **Clase 7**.

---

## Funcionalidades probadas

| N° | Prueba | Ruta | Acción | Resultado esperado | Resultado obtenido | Estado |
|----|--------|------|--------|--------------------|--------------------|--------|
| 1  | Crear producto | `/admin/productos/create` | Llenar formulario con datos válidos | El producto se guarda en DB y aparece en el catálogo público | Funciona correctamente | ✅ |
| 2  | Listar productos | `/admin/productos` y `/productos` | Ver listado en admin y en catálogo público | Productos visibles en ambas vistas | Funciona correctamente | ✅ |
| 3  | Editar producto | `/admin/productos/{id}/edit` | Cambiar nombre, precio o stock | Cambios reflejados en admin y catálogo | Funciona correctamente | ✅ |
| 4  | Eliminar producto | `/admin/productos/{id}` (DELETE) | Eliminar un producto existente | Producto eliminado en DB y catálogo | Funciona correctamente | ✅ |
| 5  | Acceso sin login | `/admin/productos/create` | Intentar ingresar sin autenticación | Redirige automáticamente a `/login` | Funciona correctamente | ✅ |
| 6  | Login de usuario | `/login` | Ingresar credenciales válidas | Usuario autenticado y redirigido al home | Funciona correctamente | ✅ |
| 7  | Logout de usuario | `/logout` | Cerrar sesión | Usuario deslogueado y redirigido al home | Funciona correctamente | ✅ |

---

## Conclusión
El sistema cumple con los objetivos de la **versión 0.2**:  
- CRUD completo de productos.  
- Autenticación básica (login, register, logout).  
- Rutas protegidas con middleware `auth`.  
- Catálogo público accesible para visitantes.  

 **Estado actual:** Estable y funcional para pruebas de integración.  
Listo para avanzar hacia la implementación de nuevos módulos en próximas clases (carrito de compras, roles de usuario, reportes, etc.).

---

---

# 📊 Resumen de Avances – Clase 9 (Versión 0.8)

Durante la sesión 9, se consolidaron todas las funcionalidades principales del sistema **SISOFT_SAUL**, garantizando un flujo estable entre el frontend, backend y base de datos.

## ✅ Funcionalidades completadas
- CRUD completo de productos (crear, editar, eliminar y listar).  
- Catálogo público conectado a la base de datos.  
- Sistema de autenticación (login y logout).  
- Carrito de compras funcional con actualización y eliminación.  
- Validaciones básicas y mensajes de confirmación.  
- Interfaz optimizada con Bootstrap 5 y mensajes flash.  

## 🧩 Ajustes realizados
- Revisión del flujo de sesión y protección de rutas admin.  
- Corrección de enlaces en header y rutas públicas.  
- Verificación del guardado y visualización de imágenes.  
- Limpieza de código y eliminación de pruebas temporales.  

## 📅 Plan para la versión final (v1.0)
- Grabar el video demostrativo final del sistema.  
- Revisar detalles visuales menores (colores y espaciado).  
- Confirmar funcionamiento en servidor local sin errores.  

📦 **Estado actual:**  
> 🟢 Versión 0.8 estable y lista para cierre del proyecto.
