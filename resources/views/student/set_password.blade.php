<form action="{{ route('students.update_password', $student->id) }}" method="POST">  
    @csrf  
    <label for="password">Nueva Contraseña:</label>  
    <input type="password" name="password" required>  
    
    <label for="password_confirmation">Confirmar Contraseña:</label>  
    <input type="password" name="password_confirmation" required>  
    
    <button type="submit">Guardar Contraseña</button>  
</form>  