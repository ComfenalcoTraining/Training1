using Prueba_Comfenalco.Models;

namespace Prueba_Comfenalco.Services.IServices
{
	public interface IUsuarioService
	{
		Task AgregarUsuario(Usuario usuario);
		String IniciarSesion(string correo, string contraseña);
		dynamic ObtenerUsuarioByCorreo(string correo);
	}
}
