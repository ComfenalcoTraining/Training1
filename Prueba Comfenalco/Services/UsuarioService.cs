using Prueba_Comfenalco.Context;
using Prueba_Comfenalco.Models;
using Prueba_Comfenalco.Services.IServices;

namespace Prueba_Comfenalco.Services
{
	public class UsuarioService : IUsuarioService
	{
        BancoContext _bancoContext;
        public UsuarioService(BancoContext bancoContext)
        {
           _bancoContext = bancoContext;
        }

        public async Task AgregarUsuario(Usuario usuario)
        { 
            var targetUsuario = _bancoContext.Usuarios.Where(p => p.Correo == usuario.Correo).FirstOrDefault();

            if(targetUsuario != null) 
            {
                throw new InvalidOperationException("El usuario que intenta registrar con ese correo ya se encuentra registrado");
            }
           
            _bancoContext.Usuarios.Add(usuario);
            await _bancoContext.SaveChangesAsync();
        }

        public String IniciarSesion(string correo, string contraseña)
        { 
            var usuario = _bancoContext.Usuarios.Where(p => p.Correo == correo && p.Contraseña == contraseña).FirstOrDefault();
			if (usuario == null)
			{
				throw new InvalidOperationException("Credenciales incorrectas, intentelo de nuevo");
			}
            return usuario.Nombre;
		}

        public dynamic ObtenerUsuarioByCorreo(string correo) 
        {
            var usarioEncontrado = _bancoContext.Usuarios.Where(p => p.Correo == correo).FirstOrDefault();

            return usarioEncontrado;
		}
    }
}
