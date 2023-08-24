import Container from "../../components/utils/Container";
import Parrafo from "../../components/utils/Parrafo";
import Titulo from "../../components/utils/Titulo";

export default function Faqs() {
    return (
        <Container className="py-[30px] md:py-[60px]">
            <Titulo className="mb-8">RESOLVEMOS TODAS TUS DUDAS</Titulo>
            <Parrafo className="text-center mx-auto max-w-3xl">
                Nos enfocamos en brindar mejores y más eficientes servicios de
                análisis clínicos que te ayuden a monitorear lo más importante:{" "}
                <span className="font-bold">tu salud.</span>
            </Parrafo>

            <Parrafo className="text-center mx-auto max-w-3xl">
                Nos enfocamos en brindar mejores y más eficientes servicios de
                análisis clínicos que te ayuden a monitorear lo más importante:{" "}
                <span className="font-bold">tu salud.</span>
            </Parrafo>
        </Container>
    );
}
