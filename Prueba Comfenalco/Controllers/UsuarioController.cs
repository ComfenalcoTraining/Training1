using Microsoft.AspNetCore.Mvc;
using Prueba_Comfenalco.Models;
using Prueba_Comfenalco.Services.IServices;

namespace WebApplication1.Controllers
{
	[ApiController]
	[Route("api/[controller]/[action]")]
	public class UsuarioController : ControllerBase
	{
        IUsuarioService _usuarioService;
        public UsuarioController(IUsuarioService usuarioService)
        {
			_usuarioService = usuarioService;
		}

		[HttpPost]
		public async Task<IActionResult> AgregarUsuario(Usuario usuario)
		{
			_usuarioService.AgregarUsuario(usuario);
			return Ok();
		}
		[HttpPost]
		public async Task<IActionResult> IniciarSesion(string correo, string contraseña)
		{
			var res = _usuarioService.IniciarSesion(correo, contraseña);
			return Ok(res);
		}

		[HttpGet]
		public IActionResult ObtenerUsuarioByCorreo(string correo)
		{
			var res = _usuarioService.ObtenerUsuarioByCorreo(correo);
			return Ok(res);
		}

	}
}
