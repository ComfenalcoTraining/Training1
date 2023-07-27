import { Button, Grid,TextField, Typography, Paper,AppBar,IconButton,Toolbar, Snackbar,CircularProgress } from '@mui/material';
import React from 'react'

const LoguinForm = () => {
  return (
    <>
        <AppBar position="static">
        <Toolbar>
          <IconButton edge="start" color="inherit" aria-label="back">
          </IconButton>
          <Typography variant="h6">Loguin</Typography>
        </Toolbar>
    </AppBar>
     <form  className='form-container'>
                <Grid
                    container
                    direction="column"
                    alignItems={"center"}
                    justifyContent={'space-evenly'}
                    spacing={2}
                    sx={{ width: "100%" }}
                >
                    <Grid item >
                        <TextField 
                            type='text'
                            label='Correo'
                            variant='outlined'
                            fullWidth
                            name="correo"
                           
                        />
                    </Grid>
                    <Grid item >
                        <TextField 
                            type='text'
                            label='Contraseña'
                            variant='outlined'
                            fullWidth
                            name='contraseña'
                                    />
                    </Grid>
                    <Grid item >
                        <Button type="submit" variant='contained'>
                             Guardar Asignatura
                        </Button>       
                    </Grid>            
                </Grid>
                </form>
                    </>
  )
}

export default LoguinForm