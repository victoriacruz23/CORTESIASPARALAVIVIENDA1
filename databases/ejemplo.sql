// Use DBML to define your database structure
// Docs: https://dbml.dbdiagram.io/docs

Table rol {
   RolId integer [primary key]
   RolNombre CHARACTER 
}

Table usuario {
  UsuarioId integer [primary key]
  RolId int
  username varchar
  userApe varchar
  role varchar
  created_at timestamp
}

Table afiliado {
  AfiliadoId integer [primary key]
  RFC CHARACTER
  NombreAfiliado varchar
  Fecha_de_Alta date
}
Table perfil {
  PerfilId integer [primary key]
  UsuarioId int
  UsuarioNickName varchar
  Fotoperfil varchar
  telefono int
}
Table desposito {
  DepositoId integer [primary key]
  AfiliadoId int
  saldo int
  fecha_de_deposito date
}

Ref: rol.RolId < usuario.RolId // many-to-one

Ref: usuario.UsuarioId - perfil.UsuarioId

Ref: afiliado.AfiliadoId < desposito.AfiliadoId
