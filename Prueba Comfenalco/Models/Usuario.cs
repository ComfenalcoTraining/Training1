using System.ComponentModel.DataAnnotations;

namespace Prueba_Comfenalco.Models
{
	public class Usuario
	{
		[Key]
		public string Correo { get; set; }
		public string Nombre { get; set; }
		public string Contraseña { get; set; }
	}
}
