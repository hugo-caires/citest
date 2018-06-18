--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.3
-- Dumped by pg_dump version 9.6.3

-- Started on 2018-06-18 11:56:10

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12387)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2130 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- TOC entry 186 (class 1259 OID 23534)
-- Name: user_id; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE user_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE user_id OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 185 (class 1259 OID 23528)
-- Name: user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "user" (
    id integer DEFAULT nextval('user_id'::regclass) NOT NULL,
    nome character varying NOT NULL,
    email character varying NOT NULL,
    password character varying NOT NULL,
    criacao timestamp without time zone NOT NULL
);


ALTER TABLE "user" OWNER TO postgres;

--
-- TOC entry 2122 (class 0 OID 23528)
-- Dependencies: 185
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "user" (id, nome, email, password, criacao) VALUES (1, 'Hugo Caires', 'hugocaires@hotmail.com', '$2y$10$vbtEQvHawT.W.CqF90RrVeWsX2T0U4pL95Z0XluwjXOx5/9xgk9La', '2018-06-18 00:00:00');
INSERT INTO "user" (id, nome, email, password, criacao) VALUES (2, 'Hugo João Andrade Caires', 'hugocaires7@gmail.com', '$2y$10$7YAI9IuJVbssYR4EbXVVhOcnwTYRMtYfTyN9tYvTRvE0ILQGpHXRi', '2018-06-18 02:01:21');


--
-- TOC entry 2131 (class 0 OID 0)
-- Dependencies: 186
-- Name: user_id; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('user_id', 2, true);


--
-- TOC entry 2004 (class 2606 OID 23537)
-- Name: user user_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pk PRIMARY KEY (id);


-- Completed on 2018-06-18 11:56:12

--
-- PostgreSQL database dump complete
--

