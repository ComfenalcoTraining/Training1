using Microsoft.EntityFrameworkCore;
using Prueba_Comfenalco.Models;

namespace Prueba_Comfenalco.Context
{
	public class BancoContext : DbContext

	{
        public BancoContext(){}
        public DbSet<Usuario> Usuarios { get; set; }

		public BancoContext(DbContextOptions<BancoContext> options) : base(options) { }
	}
}
