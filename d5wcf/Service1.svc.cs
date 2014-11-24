using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.ServiceModel.Web;
using System.Text;

using System.Web;
using System.Web.Services;

namespace WcfService4
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the class name "Service1" in code, svc and config file together.
    // NOTE: In order to launch WCF Test Client for testing this service, please select Service1.svc or Service1.svc.cs at the Solution Explorer and start debugging.
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    public class Service1 : IService1
    {

        public Ciel.Turno hola(int oficina)
        {
            WcfService4.Ciel.ServicioSelector mysvc = new Ciel.ServicioSelector();
            WcfService4.Ciel.Oficina[] oficinas = mysvc.ObtenerOficinasSistema();  // myof[0].Nombre;
            //return oficinas;            
            //return mysvc.ObtenerOficinasSistema();  // myof[0].Nombre;
            
            for (int i = 0; i < oficinas.Length; i++) // CONSEGUIMOS OFICINA
            {
                if (oficina == oficinas[i].Id)
                {

                    Ciel.Oficina oficinaO = oficinas[i];
                    WcfService4.Ciel.Selector[] selectores = mysvc.ObtenerSelectoresXOficina(oficinaO.Id, true);
                    WcfService4.Ciel.Cola[] colas = mysvc.ObtenerColasXSelectorXJornadaActual(selectores[0].Id, true);
                    WcfService4.Ciel.Sala[] salas = mysvc.ObtenerSalasDeSelector(selectores[0].Id, true);
                    Ciel.UsuarioClienteWS usuario = new Ciel.UsuarioClienteWS();
                    usuario.Identificacion = "79779705";
                    usuario.TipoIdentificacion = "2";
                    return mysvc.CrearTurno(oficinaO.Id, true, selectores[0].Id, true,
                        Ciel.EntesDelSistemaTipo.Sala, true, 1, true,
                        colas, false, false,
                        "", usuario, "ciel", false, false);
                    /*return selectores;
                    int value = 2;
                    return string.Format("You entered: {0}", value);*/

                }
            }
            return null;
        }

        public string GetData(int value)
        {
            //return string.Format("You entered: {0}", value);
            WcfService4.Ciel.ServicioSelector mysvc = new Ciel.ServicioSelector();
            WcfService4.Ciel.Oficina[] oficinas = mysvc.ObtenerOficinasSistema();  // myof[0].Nombre;
            //return oficinas;            
            //return mysvc.ObtenerOficinasSistema();  // myof[0].Nombre;

            for (int i = 0; i < oficinas.Length; i++) // CONSEGUIMOS OFICINA
            {
                if (value == oficinas[i].Id)
                {

                    Ciel.Oficina oficinaO = oficinas[i];
                    WcfService4.Ciel.Selector[] selectores = mysvc.ObtenerSelectoresXOficina(oficinaO.Id, true);
                    WcfService4.Ciel.Cola[] colas = mysvc.ObtenerColasXSelectorXJornadaActual(selectores[0].Id, true);
                    WcfService4.Ciel.Sala[] salas = mysvc.ObtenerSalasDeSelector(selectores[0].Id, true);
                    Ciel.UsuarioClienteWS usuario = new Ciel.UsuarioClienteWS();
                    usuario.Identificacion = "79779705";
                    usuario.TipoIdentificacion = "2";
                    Ciel.Turno turno = mysvc.CrearTurno(oficinaO.Id, true, selectores[0].Id, true,
                        Ciel.EntesDelSistemaTipo.Sala, true, 1, true,
                        colas, false, false,
                        "", usuario, "ciel", false, false);
                    //return selectores;
                    //int value = 2;
                    return string.Format("You entered: {0}", turno.Numero);

                }
            }
            return null;
        }

        public CompositeType GetDataUsingDataContract(CompositeType composite)
        {
            if (composite == null)
            {
                throw new ArgumentNullException("composite");
            }
            if (composite.BoolValue)
            {
                composite.StringValue += "Suffix";
            }
            return composite;
        }
    }
}
