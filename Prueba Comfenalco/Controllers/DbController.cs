using Microsoft.AspNetCore.Mvc;
using Prueba_Comfenalco.Context;

namespace Prueba_Comfenalco.Controllers
{
	[ApiController]
	[Route("api/[controller]/[action]")]
	public class DbController : ControllerBase
	{
		BancoContext _bancoContext;
        public DbController(BancoContext bancoContext)
        {
            _bancoContext = bancoContext;
        }
        [HttpGet]
		[Route("createdb")]
		public IActionResult CreateDatabase()
		{
			_bancoContext.Database.EnsureCreated();
			return Ok();
		}
	}
}
