<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Lista de orígenes permitidos
        $allowedOrigins = [
           
            'http://localhost:5173',
            'http://localhost:5174',
        ];

        // Obtén el origen de la solicitud
        $origin = $request->headers->get('origin');

        // Verifica si el origen está en la lista de orígenes permitidos
        if (in_array($origin, $allowedOrigins)) {
            $response->headers->set('Access-Control-Allow-Origin', $origin);
        } else {
            $response->headers->set('Access-Control-Allow-Origin', ''); // O dejarlo vacío si no se permite
        }

        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Origin, Authorization');

        return $response;
    }
}
