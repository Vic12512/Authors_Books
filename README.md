📚 Library Manager Library Manager es un sistema web para la gestión de libros y autores dentro de una biblioteca. Su objetivo es facilitar el registro, visualización y organización de obras literarias y sus respectivos autores, ofreciendo una interfaz intuitiva basada en tecnologías modernas como Laravel, Vue 3 e Inertia.js.

🚀 Tecnologías Utilizadas 🐘 PHP 8.2+

⚙️ Laravel 12+

🧩 MySQL

🌐 Vue 3 + Inertia.js

🎨 Bootstrap o Vuetify

📦 Composer

🐙 Git

🗃️ Funcionalidades Principales 📕 Gestión de Libros Crear, editar, eliminar y visualizar detalles de libros.

Cada libro debe estar asociado al menos a un autor.

✍️ Gestión de Autores Crear, editar, ocultar (soft delete) y visualizar autores.

Los autores pueden existir sin libros asignados.

Autores eliminados mediante soft delete no se muestran en las tablas, pero sí en los detalles de los libros relacionados.

🔁 Relaciones Relación muchos a muchos entre libros y autores.

📋 Vista de Datos Las entidades principales se presentan en tablas con funcionalidades de:

🔍 Ver detalles

✏️ Editar

🗑️ Eliminar (o 👁️ Ocultar para autores)

Campos destacados en la vista de detalles (no mostrados en las tablas generales):

Autores: país, fecha de registro, cantidad de libros

Libros: fecha de publicación, edición, autores relacionados

🧱 Estructura de Base de Datos La base de datos está normalizada y diseñada para reflejar las relaciones reales entre autores y libros, garantizando integridad y consistencia en los datos.
