using Prueba_Comfenalco.Context;
using Prueba_Comfenalco.Services.IServices;
using Prueba_Comfenalco.Services;

var builder = WebApplication.CreateBuilder(args);

builder.Services.AddSqlServer<BancoContext>(builder.Configuration.GetConnectionString("dbconection"));

// Add services to the container.

builder.Services.AddControllers();
// Learn more about configuring Swagger/OpenAPI at https://aka.ms/aspnetcore/swashbuckle
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();

//Services
builder.Services.AddScoped<IUsuarioService, UsuarioService>();

var app = builder.Build();

// Configure the HTTP request pipeline.
if (app.Environment.IsDevelopment())
{
	app.UseSwagger();
	app.UseSwaggerUI();
}

app.UseHttpsRedirection();

app.UseAuthorization();

app.MapControllers();

app.Run();
