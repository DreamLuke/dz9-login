<?php 

/*Напишите оболочку-класс над session. Оболочка должна представлять собой набор функций: 
  1. конструктор в котором будет session_start(), 
  2. сохранение значения в сессию, 
  3. удаление значения из сессии, 
  4. редактирование значения сессии, 
  5. удаление самой сессии.*/
class Session
{
	public function __construct()
	{
		session_start();
	}

	public function set(string $key, $values)
	{
		$_SESSION[$key] = $values;
	}
	public function unset(string $key)
	{
		unset($_SESSION[$key]);
	}
	/*public function update(string $key, $values)
	{
		$_SESSION[$key] = $values;
	}*/
	public function destroy()
	{
		session_destroy();
	}
}



